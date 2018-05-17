console.log('Javascript is working');

// Throw data to cart
function addToCart(itemId) {
	var id = itemId;
	var itemName = $('#itemName'+ id).html();
	var quantity = $('#itemQuantity' + id).val();

	$.bootstrapGrowl(quantity + " pc(s) of " + itemName + " has successfully added to your cart.");
	
	$.post('assets/add_to_cart.php', 
		{
			item_id : id,
			item_quantity: quantity
		},

		function (data,status) {
			$('a[href="cart.php"]').html(data);

		});
	}

/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function toggle_nav() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

// /* When the user clicks on the button, 
// toggle between hiding and showing the dropdown content */
// function dropdown() {
//     document.getElementById("myDropdown").classList.toggle("show");
// }

// // Close the dropdown menu if the user clicks outside of it
// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn')) {

//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }


