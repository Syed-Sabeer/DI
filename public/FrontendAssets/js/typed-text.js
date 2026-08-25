'use strict'

const words = [
  "Web Developer",
  "UI/UX Engineer",
  "Frontend Specialist",
  "Building Scalable Interfaces",
  "Crafting Modern Web Design"
  ];

  const typedText = document.getElementById("typed-text");

  let wordIndex = 0;
  let charIndex = 0;
  let isDeleting = false;
  let typingSpeed = 120;
  let deletingSpeed = 70;
  let pauseAfterTyping = 1500;

  function typeEffect() {
    const currentWord = words[wordIndex];

    if (!isDeleting) {
      typedText.textContent = currentWord.substring(0, charIndex + 1);
      charIndex++;

      if (charIndex === currentWord.length) {
        isDeleting = true;
        setTimeout(typeEffect, pauseAfterTyping);
        return;
      }

      setTimeout(typeEffect, typingSpeed);
    } else {
      typedText.textContent = currentWord.substring(0, charIndex - 1);
      charIndex--;

      if (charIndex === 0) {
        isDeleting = false;
        wordIndex = (wordIndex + 1) % words.length;
      }

      setTimeout(typeEffect, deletingSpeed);
    }
  }

  typeEffect();