<?php

namespace App\Jobs;

use App\Models\Career;
use App\Models\CareerAlertDelivery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ResendCareerAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $timeout = 120;

    public function __construct(public int $careerId)
    {
    }

    public function handle(): void
    {
        $career = Career::query()->find($this->careerId);

        if (! $career) {
            return;
        }

        if (! $career->visibility) {
            CareerAlertDelivery::query()
                ->where('career_id', $this->careerId)
                ->where('status', 'resend_queued')
                ->update(['status' => 'cancelled', 'updated_at' => now()]);

            return;
        }

        CareerAlertDelivery::query()
            ->where('career_id', $this->careerId)
            ->where('status', 'resend_queued')
            ->select('id')
            ->orderBy('id')
            ->chunkById(250, function ($deliveries): void {
                $deliveryIds = $deliveries->pluck('id')->all();

                DB::transaction(function () use ($deliveryIds): void {
                    CareerAlertDelivery::query()
                        ->whereIn('id', $deliveryIds)
                        ->update([
                            'status' => 'queued',
                            'failure_message' => null,
                            'updated_at' => now(),
                        ]);

                    foreach ($deliveryIds as $deliveryId) {
                        SendCareerAlertEmail::dispatch($deliveryId)
                            ->onConnection('database');
                    }
                });
            });
    }
}
