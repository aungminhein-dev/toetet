// loading page
window.addEventListener("load",loading)
let loader = document.querySelector('#loader');
function loading(){
    loader.classList.add('d-none')
}
function submitForm(event) {
    event.preventDefault(); // prevent default form submission behavior
   loader.style.display = "block"; // show loading screen
    setTimeout(function() {
      event.target.submit(); // submit form after a short delay
    }, 500); // adjust delay time as needed
}
