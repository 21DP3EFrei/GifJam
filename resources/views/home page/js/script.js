//home
function generateColor() {
    let color = '#';
    let digits = '0123456789ABCDEF';
    for (let i = 0; i < 6; i++) {
      let randomDigit = Math.floor(Math.random() * 16);
      color += digits[randomDigit];
    }
    document.body.style.backgroundColor = color; // Update the background color of the body
  }
  
  document.addEventListener("DOMContentLoaded", function () {
    // Get the button element by its id
    const generateButton = document.getElementById("generateButton");
  
    // Attach a click event listener to the button
    generateButton.addEventListener("click", generateColor);
  });

// JavaScript
document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('oldMemesCheckbox').addEventListener('change', function () {
      const oldMemes = document.getElementById('oldMemes');
      oldMemes.style.display = this.checked ? 'block' : 'none';
  });

  document.getElementById('offensiveMemesCheckbox').addEventListener('change', function () {
      const offensiveMemes = document.getElementById('offensiveMemes');
      offensiveMemes.style.display = this.checked ? 'block' : 'none';
  });

  document.getElementById('newMemesCheckbox').addEventListener('change', function () {
      const newMemes = document.getElementById('newMemes');
      newMemes.style.display = this.checked ? 'block' : 'none';
  });

  document.getElementById('weirdMemesCheckbox').addEventListener('change', function () {
      const weirdMemes = document.getElementById('weirdMemes');
      weirdMemes.style.display = this.checked ? 'block' : 'none';
  });
});
//home
  

//info
function sendContext() {
  var email = document.getElementById('emailInput').value;
  var imageInput = document.getElementById('imageInput');
  
  // Validate email
  if (!isValidEmail(email)) {
    alert('Please enter a valid email address.');
    return;
  }

  // Check if an image is selected
  if (imageInput.files.length === 0) {
    alert('Please select an image to send.');
    return;
  }

  // Handle the image file (you may want to upload it to a server)
  var imageFile = imageInput.files[0];
  console.log('Email:', email);
  console.log('Image File:', imageFile);
  
  // Simulate sending the file (replace this with your actual file upload code)
  simulateFileUpload(imageFile);

  // Display success message
  alert('File sent successfully!');
}

function isValidEmail(email) {
  // You can use a regular expression for basic email validation
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

// Simulate file upload (replace this with your actual file upload code)
function simulateFileUpload(file) {
  console.log('Simulating file upload:', file.name);
  // Add your file upload logic here
}


//info





// login
function login() {
  // Get values from login form
  const email = document.getElementById('loginEmail').value;
  const password = document.getElementById('loginPassword').value;

  // Simple validation
  if (!isValidEmail(email) || !password) {
    document.getElementById('loginError').innerText = 'Please enter a valid email and password.';
    return;
  }

  // Clear error message
  document.getElementById('loginError').innerText = '';

  // Perform login logic (replace with your authentication logic)
  console.log('Login:', email, password);

  // Clear form fields
  document.getElementById('loginEmail').value = '';
  document.getElementById('loginPassword').value = '';

  // Show success message (you can customize this part)
  alert('Login successful!');
}

function signup() {
  var email = document.getElementById('signupEmail').value;
  var username = document.getElementById('signupUsername').value;
  var password = document.getElementById('signupPassword').value;

  // Validate email
  if (!isValidEmail(email)) {
    document.getElementById('signupError').innerText = 'Please enter a valid email address.';
    return;
  }

  // Validate username
  if (!isValidUsername(username)) {
    document.getElementById('signupError').innerText = 'Please choose a valid username (alphanumeric characters only).';
    return;
  }

  // Validate password (add your own password validation logic)
  if (password.length < 6) {
    document.getElementById('signupError').innerText = 'Password must be at least 6 characters long.';
    return;
  }

  // You can now send the signup data to your server or perform other actions
  console.log('Email:', email);
  console.log('Username:', username);
  console.log('Password:', password);

  // Clear the error message
  document.getElementById('signupError').innerText = '';

  // Add further logic for signing up, such as sending data to your server

  // Show success message
  alert('Sign up successful!');
}

function isValidUsername(username) {
  // You can use a regular expression for basic username validation
  var usernameRegex = /^[a-zA-Z0-9]+$/;
  return usernameRegex.test(username);
}

// login
