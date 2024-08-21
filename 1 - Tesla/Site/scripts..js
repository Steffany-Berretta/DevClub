//document = go to HTML
// querySelector=  search  where you want to search

let form = document.querySelector(".Form");

function formIN() { 
    form.style.left = "36.6%";
}

// Function to hide the form
function formOUT() {
    form.style.left = "-50%";
}

function navigateToSite() {
    const url = "https://www.tesla.com/model3/design#overview";
    window.location.href = url;
}