document.addEventListener("DOMContentLoaded", () => {
	const endpoint = "";
	if (document.querySelector("select#product-type")) {
		const beautyCheckBox = document.querySelector("input#_ingredients");
		const showIfIngredients = document.querySelectorAll(".show_if_ingredients");
		let is_ingredients = beautyCheckBox.checked;
		if (showIfIngredients) {
			showIfIngredients.forEach((showIfIngredient) => {
				if (is_ingredients) {
					showIfIngredient.style.display = "";
				} else {
					showIfIngredient.style.display = "none";
				}
			});
		}
		beautyCheckBox.addEventListener("click", () => {
			is_ingredients = beautyCheckBox.checked;
			if (showIfIngredients) {
				showIfIngredients.forEach((showIfIngredient) => {
					if (is_ingredients) {
						showIfIngredient.style.display = "";
					} else {
						showIfIngredient.style.display = "none";
					}
				});
			}
		});
	}
	// let is_ingredients = document.querySelector("input#_ingredients:checked");
	// console.log(is_ingredients);
});
