(function () {
    "use strict";

    const form = document.getElementById("team-contact-form");

    if (!form) {
        return;
    }

    const submitButton = form.querySelector('button[type="submit"]');
    const submitText = submitButton ? submitButton.querySelector("span:last-child") : null;
    const defaultButtonText = submitText ? submitText.textContent : "";
    const statusMessage = document.createElement("div");

    statusMessage.className = "alert d-none mb-3";
    statusMessage.setAttribute("role", "alert");
    form.prepend(statusMessage);

    function showMessage(type, message) {
        statusMessage.className = "alert mb-3 alert-" + type;
        statusMessage.textContent = message;
    }

    function setLoading(isLoading) {
        if (!submitButton) {
            return;
        }

        submitButton.disabled = isLoading;

        if (submitText) {
            submitText.textContent = isLoading ? "Sending..." : defaultButtonText;
        }
    }

    form.addEventListener("submit", async function (event) {
        event.preventDefault();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        setLoading(true);
        statusMessage.className = "alert d-none mb-3";
        statusMessage.textContent = "";

        try {
            const response = await fetch(form.action, {
                method: "POST",
                body: new FormData(form),
                headers: {
                    "Accept": "application/json"
                }
            });

            const responseText = await response.text();
            let result = {};

            try {
                result = responseText ? JSON.parse(responseText) : {};
            } catch (parseError) {
                // throw new Error("The server returned an invalid response. Please check the PHP/SMTP configuration.");
                throw new Error("In demo mode, this action is disabled.");
            }

            if (!response.ok || !result.success) {
                throw new Error(result.message || "Something went wrong. Please try again.");
            }

            form.reset();
            showMessage("success", result.message || "Thank you! Your message has been sent successfully.");
        } catch (error) {
            showMessage("danger", error.message || "Something went wrong. Please try again.");
        } finally {
            setLoading(false);
        }
    });
})();
