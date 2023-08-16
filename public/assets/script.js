// popup card
function showPopup() {
    var popupCard = document.getElementById("popupCard");
    console.log(popupCard);
    popupCard.style.display = "block";
}

function hidePopup() {
    var popupCard = document.getElementById("popupCard");
    popupCard.style.display = "none";
}

// quantity
var quantity = 1;

function increaseQuantity() {
  quantity++;
  updateQuantityDisplay();
}

function decreaseQuantity() {
  if (quantity > 1) {
    quantity--;
    updateQuantityDisplay();
  }
}

function updateQuantityDisplay() {
  var quantityDisplay = document.getElementById('quantityDisplay');
  quantityDisplay.innerText = quantity;
}
