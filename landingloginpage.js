const popup = document.getElementById('popupForm');
const openBtn = document.getElementById('openPopup');
const closeBtn = document.getElementById('closePopup');
const form = document.getElementById('registrationForm');
const output = document.getElementById('output');

// Toggle popup visibility
openBtn.onclick = () => popup.classList.add('show');
closeBtn.onclick = () => popup.classList.remove('show');

// Form submission with fetch
form.onsubmit = async (e) => {
  e.preventDefault();
  output.textContent = "Submitting...";

  try {
    const response = await fetch(form.action, {
      method: 'POST',
      body: new FormData(form)
    });

    output.textContent = await response.text();
    form.reset();

    setTimeout(() => {
      popup.classList.remove('show');
      output.textContent = "";
    }, 2000);
  } catch {
    output.textContent = "Submission failed. Please try again.";
  }
};

