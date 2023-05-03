let dishes = new Map();
let operateType = "";
let searchDishes = new Map();

class Dish {
    constructor(code, dishName, description, category, price, image) {
        this._code = code;
        this._dishName = dishName;
        this._description = description;
        this._category = category;
        this._price = price;
        this._image = image;
    }


    findDish(data) {
        searchDishes.clear();
        let searchResults = [];
        for (let dish of dishes.values()) {
            if (dish._code === data._code ||
                dish._dishName === data._dishName ||
                dish._code.includes(data._all) ||
                dish._dishName.includes(data._all) ||
                dish._description.includes(data._all) ||
                dish._category.includes(data._all) ||
                dish._price.includes(data._all)) {
                searchResults.push(dish);
            }
        }
        for (const dish of searchResults) {
            searchDishes.set(dish._code, dish);
        }
        refreshData(searchDishes);
    }


}

$('#myModal').on('show.bs.modal', function () {
    // when popping out the modal window, make body add modal-open Class, and set overflow to hidden
    $('body').addClass('modal-open').css('overflow', 'hidden');

});


$('#myModal').on('hidden.bs.modal', () => {
    $('body').removeClass('modal-open').css('overflow', 'auto');
    let inputElements = document.getElementById("myModal").getElementsByTagName("input");
    let dishArr = [];
    for (let i = 0; i < inputElements.length; i++) {
        dishArr[i] = inputElements[i].value;
    }
    let dish = new Dish(...dishArr);
    if (operateType === "add") {
        let dishAdd = new Dish(...dishArr);
        dishes.set(dishAdd._code, dishAdd);
        refreshData(dishes);
        document.querySelectorAll('.form-control').forEach(item => {
            item.value = ''
        })
    } else if (operateType === "edit") {
        // delete current item first
        const checkRowData = isChecked();
        const dishToDel = collectRowData(checkRowData);
        const dishTDCode = dishToDel._code[0]
        dishes.delete(dishTDCode);
        // set the values to the new item
        const dishCode = dish._code[0]
        dishes.set(dishCode, dish._code)
        refreshData(dishes);
    }
});

function loadDishData() {
    initDishData();
    refreshData(dishes);
}

function initDishData() {
    let initDish1 = new Dish("1001", "Pizza A", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ", "Pizza", "20", "assets/pizza.jpg");
    let initDish2 = new Dish("1002", "Spaghetti", "Lorem", "Spaghetti", "24", "assets/spaghetti.jpg");
    let initDish3 = new Dish("1003", "Salad", "Pricey but delicious", "Salad", "11", "assets/salad.jpg");
    let initDish4 = new Dish("1004", "Pizza B", "Pricey but delicious", "Pizza", "22", "assets/pizza.jpg");
    dishes.set(initDish1._code, initDish1);
    dishes.set(initDish2._code, initDish2);
    dishes.set(initDish3._code, initDish3);
    dishes.set(initDish4._code, initDish4);
}

// This function adds row data to a table
const addRowData = (datas) => {
    // Find the table body element
    const tbodyElement = document.getElementById("tbody");
    // Create a variable to hold the HTML string that will be added to the table body
    let html = "";
    // Set the initial color of the row to 'warning'
    let color = "warning";
    // Set a flag to help alternate row colors
    let flag = true;
    // Loop through the datas array and add each data object to the table
    for (const data of datas) {
        // Alternate the row color based on the flag
        color = flag ? "info" : "warning";
        if (data._code) {
            // Add the data object to the HTML string
            html += `
      <tr class='${color}'>
        <td style='width:30px;'><input type='checkbox'></td>
        <td id='code'>${data._code}</td>
        <td id='dishName'>${data._dishName}</td>
        <td id='description'>${data._description}</td>
        <td id='category'>${data._category}</td>
        <td id='price'>${data._price}</td>
        <td id='image'><img src="${data._image}" alt="${data._dishName} image" height="80px"></td>
      </tr>`;
        }

        // Toggle the flag
        flag = !flag;
    }
    // Add the HTML string to the table body
    tbodyElement.innerHTML = html;
};

// This function refreshes the table with the given data
const refreshData = (data) => {
    console.log('data', data)
    if (data instanceof Map) {
        addRowData([...data.values()]);
    } else if (Array.isArray(data)) {
        addRowData(data);
    }
};

// This function collects the data from a table row and returns a Dish object
let collectRowData = (param) => {
    // Find all the <td> elements in the given row
    const tdElements = param.getElementsByTagName("td");
    // Create an array to hold the row data
    const dishArr = [];
    // Loop through the <td> elements starting from the second element
    for (let i = 1; i < tdElements.length; i++) {
        // Get the text content of the <td> element and add it to the array
        dishArr[i - 1] = tdElements[i].textContent
    }
    // Create a new Dish object from the row data array and return it
    const dish = new Dish(dishArr);
    return dish;
};

/**
 * Dish operation method.
 */
const option = (param) => {
        // Get operation type
        const optionType = param.getAttribute("id");

        if (optionType === "dish_add") {
            operateType = "add";
        } else if (optionType === "dish_delete") {
            const checkboxes = document.querySelectorAll("input[type=checkbox]:checked");
            if (checkboxes.length < 1) {
                alert("Please select at least one row to delete.");
                return;
            }
            const confirmDelete = confirm("Are you sure you want to delete the selected row(s)?");
            if (confirmDelete) {
                checkboxes.forEach((checkbox) => {
                    let row = checkbox.parentNode.parentNode;
                    dishes.delete(row.cells[1].innerHTML);
                });
                refreshData(dishes);
            }
            return;
        } else if (optionType === "dish_edit") {
            let checkboxes = document.querySelectorAll("input[type=checkbox]:checked");
            if (checkboxes.length > 1) {
                alert("Please select only one row to edit.");
                return;
            } else if (checkboxes.length < 1) {
                alert("Please select a row to edit.");
                return;
            }
            operateType = "edit";
        } else if (optionType === "dish_find") {
            const s_code = document.getElementById("s_code").value;
            const s_dishName = document.getElementById("s_dishName").value;
            const s_all = document.getElementById("s_all").value;
            // Search data
            let s_data = {};
            s_data._code = s_code;
            s_data._dishName = s_dishName;
            s_data._all = s_all;
            const dish = new Dish();
            dish.findDish(s_data);
        } else {
            // Do nothing
        }

    }
;
const isChecked = () => {
    const tbodyElement = document.getElementById("tbody");
    const trElements = tbodyElement.getElementsByTagName("tr");
    let flag = false;
    for (let i = 0; i < trElements.length; i++) {
        const inputElement = trElements[i].getElementsByTagName("input")[0];
        if (inputElement.checked) {
            flag = true;
            return trElements[i];
        }
    }
};