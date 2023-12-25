<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form with Pre-selected Option</title>
</head>
<body>

    <form id="myForm">
        <label for="mySelect">Select a fruit:</label>
        <select id="mySelect" name="fruit">
            <option value="apple">Apple</option>
            <option value="banana">Banana</option>
            <option value="orange">Orange</option>
        </select>

        <input type="submit" value="Submit">
    </form>
    
    <script>
        // Assume this is the value you want to pre-select (e.g., from a previous form submission)
        var preselectedValue = "banana";

        // Get the select element
        var select = document.getElementById("mySelect");

        // Loop through the options
        for (var i = 0; i < select.options.length; i++) {
            // Check if the option value matches the preselected value
            console.log(select.options[i].value+"\n");
            
        }

        // You can also listen for the form submission and handle it accordingly
        document.getElementById("myForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevents the form from actually submitting for this example
            var selectedValue = select.value;
            console.log("Form submitted with selected value: " + selectedValue);
            // Add logic to handle the form submission (e.g., send data to server)
        });
    </script>

</body>
</html>
