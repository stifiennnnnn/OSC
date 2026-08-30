function togglePassword(button) {
    const icon = button.querySelector("#password-icon");
    const input = button.previousElementSibling;
    if (input.type === "password") {
        input.type = "text";
        button.setAttribute("aria-label", "Hide password");
        icon.innerHTML = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12c2.5 3 5.5 4.5 9 4.5s6.5-1.5 9-4.5"></path></svg>`
        
    } else {
        input.type = "password";
        button.setAttribute("aria-label", "Show password");
        icon.innerHTML = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2.5 12s3.5-5 9.5-5 9.5 5 9.5 5-3.5 5-9.5 5-9.5-5-9.5-5Z"></path><circle cx="12" cy="12" r="2.5"></circle></svg>`
    }
}