document.addEventListener('DOMContentLoaded', function () {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetchachievements.php', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);

            // Assuming the second row represents the achievements data
            const achievementsData = data[0]; // Assuming achievements data is an object, not an array

            // Populate achievements sidebar
            const achievementsSidebar = document.getElementById('achievementsContent');
            achievementsSidebar.innerHTML = `
                <h3>Achievements</h3>
                <ul>
                    <li>
                        <strong>Achievements:</strong> ${achievementsData.Achievements}<br>
                    </li>
                </ul>
            `;

            // Function to populate content dynamically
            const populateContent = (containerId, data) => {
                const container = document.getElementById(containerId);
                container.innerHTML = ''; // Clear existing content
                const contentItem = document.createElement('div');
                contentItem.classList.add('content-item');
                const keys = Object.keys(data);
                keys.forEach(key => {
                    contentItem.innerHTML += `<p><strong>${key}:</strong> ${data[key]}</p>`;
                });
                container.appendChild(contentItem);
            };

            // Populate other content areas as needed
            populateContent('achievementsContent', achievementsData);

        } else {
            console.error('Error fetching data:', xhr.statusText);
        }
    };

    xhr.send();
});
