// some const may be not work , have to analyze it more
const currentValueElement = document.getElementById('current-value');
const totalConsumptionElement = document.getElementById('total-consumption');
const dailyCostElement = document.getElementById('daily-cost');
const monthlyCostElement = document.getElementById('monthly-cost');
const updateButton = document.getElementById('update-btn');
const alertInfoElement = document.getElementById('alert-info');

// i added sample data (for testing purposes)
let currentConsumption = 100; // in kWh
const tariffRatePerKWh = 0.15;

// Update consumption and billing information
function updateBilling() {
    totalConsumptionElement.textContent = currentConsumption;
    dailyCostElement.textContent = (currentConsumption * tariffRatePerKWh).toFixed(2);
    monthlyCostElement.textContent = (currentConsumption * tariffRatePerKWh * 30).toFixed(2);

    // Check for high energy usage
    if (currentConsumption > 150) {
        alertInfoElement.innerHTML = "<p>High energy usage! Consider conserving electricity.</p>";
    } else {
        alertInfoElement.innerHTML = ""; // Clear alerts
    }
}

// Event listener for the "Update Consumption" button
updateButton.addEventListener('click', () => {
    // In a real application, you would fetch the updated consumption from the backend.
    // For this example, let's increase the current consumption by a random value.
    const randomConsumptionIncrease = Math.floor(Math.random() * 10) + 1;
    currentConsumption += randomConsumptionIncrease;

    // Update the displayed consumption and billing information
    currentValueElement.textContent = currentConsumption;
    updateBilling();
});

// Initial update of billing information
updateBilling();
