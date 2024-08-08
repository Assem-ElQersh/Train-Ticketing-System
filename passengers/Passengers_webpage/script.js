document.addEventListener('DOMContentLoaded', function() {
    fetchDestinations();
});

function fetchDestinations() {
    fetch('fetch_destinations.php')
        .then(response => response.json())
        .then(data => {
            const destinationSelect = document.getElementById('destination');
            data.forEach(destination => {
                const option = document.createElement('option');
                option.value = destination;
                option.textContent = destination;
                destinationSelect.appendChild(option);
            });
        });
}

function searchTrains(event) {
    event.preventDefault();
    const destination = document.getElementById('destination').value;
    const date = document.getElementById('date').value;

    fetch(`fetch_trains.php?destination=${destination}&date=${date}`)
        .then(response => response.json())
        .then(data => {
            const trainList = document.getElementById('trainList');
            trainList.innerHTML = '';

            data.forEach(train => {
                const listItem = document.createElement('li');
                listItem.textContent = `${train.train_name} - ${train.leaving_time} to ${train.expected_arrival} - ${train.class} - ${train.available_seats} seats available`;
                
                const reserveButton = document.createElement('button');
                reserveButton.textContent = 'Reserve a Ticket';
                reserveButton.classList.add('btn');
                reserveButton.addEventListener('click', function() {
                    reserveTicket(train.id);
                });

                listItem.appendChild(reserveButton);
                trainList.appendChild(listItem);
            });

            document.getElementById('results').style.display = 'block';
        });
}

function reserveTicket(trainId) {
    // Redirect to payment.php with trainId as a query parameter
    window.location.href = `payment.php?trainId=${trainId}`;
}

function confirmPayment(event) {
    event.preventDefault();

    const trainId = document.getElementById('trainId').value;
    const email = document.getElementById('email').value;
    const creditCard = document.getElementById('creditCard').value;

    console.log('Train ID:', trainId);
    console.log('Email:', email);
    console.log('Credit Card:', creditCard);

    reduceAvailableSeats(trainId);
    redirectToTicketDetails(trainId); // Redirect to ticket details page
}

function reduceAvailableSeats(trainId) {
    fetch('reduce_seats.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ trainId: trainId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error('Error reducing seats:', data.error);
            alert('Error: ' + data.error); // Alert for user feedback
        } else {
            console.log('Seats reduced successfully:', data.message);
            alert('Seats reduced successfully!'); // Alert for user feedback
        }
    })
    .catch(error => {
        console.error('Error reducing seats:', error);
        alert('Error: ' + error); // Alert for user feedback
    });
}

function redirectToTicketDetails(trainId) {
    window.location.href = `ticket_details.php?trainId=${trainId}`;
}
