document.addEventListener("DOMContentLoaded", function () {
    const cashInput = document.getElementById("cash");
    const numKeys = document.querySelectorAll(".num-key");
    const changeInput = document.getElementById("change");
    const originalTotalPrice = document.getElementById("originalTotalPrice");
    const totalInput = document.getElementById("total");
    const discount = document.getElementById("discount");
    let activeInput = document.getElementById("cash");
    let change = 0.0;

    document.querySelectorAll("input").forEach((input) => {
        input.addEventListener("focus", function () {
            if (input.id !== "change" && input.id !== "total") {
                activeInput = this;
            }
        });
    });

    function computeChange() {
        if (activeInput.id == "cash") {
            change = cashInput.value - totalInput.value;
            if (change > 0) {
                changeInput.value = change.toFixed(2);
            } else {
                changeInput.value = "0.00";
            }
        }
    }

    discount.addEventListener("change", function () {
        totalInput.value = originalTotalPrice.value;
        const selectedOption = discount.selectedOptions[0];
        const discountValue = selectedOption.getAttribute("data-discount"); //This reset the total price each time the user change the value of discount
        if (discountValue) {
            //Checks if the value is not set to none
            console.log("select");
            const discountPrice =
                parseFloat(totalInput.value) * parseFloat(discountValue);
            console.log(discountPrice);
            totalInput.value = (
                parseFloat(totalInput.value) - discountPrice
            ).toFixed(2);
        }

        computeChange(); //Automatically computes the change
    });

    cashInput.addEventListener("click", function () {
        activeInput = cashInput;
    });

    function updateInput(value) {
        console.log(value);
        if (value === "C") {
            if (activeInput.id == "cash") {
                activeInput.value = "0.00";
                changeInput.value = "0.00";
            } else {
                activeInput.value = "";
            }
        } else {
            if (activeInput.value === "0.00" && activeInput.id == "cash") {
                activeInput.value = value;
            } else {
                activeInput.value += value;
                computeChange();
            }
        }
    }

    numKeys.forEach((key) => {
        key.addEventListener("click", function () {
            const value = this.getAttribute("data-value");
            updateInput(value);
        });
    });

    document.addEventListener("keydown", function (event) {
        const key = event.key;
        if (activeInput.id == "cash") {
            if (key === "Backspace") {
                activeInput.value = activeInput.value.slice(0, -1);
                computeChange();
            }

            if (!isNaN(key) || key === ".") {
                updateInput(key);
            }
        }
    });
});
