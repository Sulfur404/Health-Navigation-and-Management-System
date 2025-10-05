document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById('container');
  const registerBtn = document.getElementById('register');
  const loginBtn = document.getElementById('login');
  
  // show correct panel 
if (document.getElementById("signupFormMessage").textContent.trim()) {
  container.classList.add("active"); 
}

  // Toggle between 
  registerBtn.addEventListener('click', () => container.classList.add("active"));
  loginBtn.addEventListener('click', () => container.classList.remove("active"));

  // Password Show or Hide 
  function setupPasswordToggle(inputId, toggleId) {
    const input = document.getElementById(inputId);
    const toggle = document.getElementById(toggleId);

    toggle.addEventListener("click", () => {
      if (input.type === "password") {
        input.type = "text";
        toggle.textContent = "Hide";
      } else {
        input.type = "password";
        toggle.textContent = "Show";
      }
    });
  }

  setupPasswordToggle("signupPassword", "toggleSignupPass");
  setupPasswordToggle("signinPassword", "toggleSigninPass");

  // signup validation
  const signupForm = document.getElementById("signupForm");
  const signupUsername = document.getElementById("signupUsername");
  const signupEmail = document.getElementById("signupEmail");
  const signupRole = document.getElementById("signupRole");
  const signupPassword = document.getElementById("signupPassword");

  const signupUsernameError = document.getElementById("signupUsernameError");
  const signupEmailError = document.getElementById("signupEmailError");
  const signupRoleError = document.getElementById("signupRoleError");
  const signupPasswordError = document.getElementById("signupPasswordError");

  function validateSignupUsername() {
    if (signupUsername.value.trim().length < 3) {
      signupUsernameError.textContent = "Username must be at least 3 characters.";
      return false;
    }
    signupUsernameError.textContent = "";
    return true;
  }

  function validateSignupEmail() {
    if (!signupEmail.value.includes("@") || !signupEmail.value.includes(".")) {
      signupEmailError.textContent = "Enter a valid E-mail address.";
      return false;
    }
    signupEmailError.textContent = "";
    return true;
  }

  function validateSignupRole() {
    if (!signupRole.value) {
      signupRoleError.textContent = "Please select a user role.";
      return false;
    }
    signupRoleError.textContent = "";
    return true;
  }

  function validateSignupPassword() {
    const pass = signupPassword.value;
    if (
      pass.length < 6 ||
      !/[A-Z]/.test(pass) ||   
      !/[a-z]/.test(pass) ||   
      !/\d/.test(pass)    ||  
      !/[@$!%*?&]/.test(pass)  
    ) {
      signupPasswordError.textContent = "Password needs at least one upper, lower, number, special & 6+ characters.";
      return false;
    }
    signupPasswordError.textContent = "";
    return true;
  }

  // on time validation
  signupUsername.addEventListener("input", validateSignupUsername);
  signupEmail.addEventListener("input", validateSignupEmail);
  signupRole.addEventListener("change", validateSignupRole);
  signupPassword.addEventListener("input", validateSignupPassword);

  // signup submit
signupForm.addEventListener("submit", (e) => {
  // Validate each field individually
  const usernameValid = validateSignupUsername();
  const emailValid = validateSignupEmail();
  const roleValid = validateSignupRole();
  const passwordValid = validateSignupPassword();

  // any field invalid
  if (!usernameValid || !emailValid || !roleValid || !passwordValid) {
    e.preventDefault();
  }
});

  // signin validation
  const signinForm = document.getElementById("signinForm");
  const signinUsername = document.getElementById("signinUsername");
  const signinPassword = document.getElementById("signinPassword");

  const signinUsernameError = document.getElementById("signinUsernameError");
  const signinPasswordError = document.getElementById("signinPasswordError");

  function validateSigninUsername() {
    if (signinUsername.value.trim() === "") {
      signinUsernameError.textContent = "Username is required.";
      return false;
    }
    signinUsernameError.textContent = "";
    return true;
  }

  function validateSigninPassword() {
  if (signinPassword.value.trim() === "") {
    signinPasswordError.textContent = "Password is required.";
    return false;
  }
  signinPasswordError.textContent = "";
  return true;
}

  
  signinUsername.addEventListener("input", validateSigninUsername);
  signinPassword.addEventListener("input", validateSigninPassword);

  // signin submit
signinForm.addEventListener("submit", (e) => {
  const usernameValid = validateSigninUsername();
  const passwordValid = validateSigninPassword();

  if (!usernameValid || !passwordValid) {
    e.preventDefault();
  }
});
 
});
