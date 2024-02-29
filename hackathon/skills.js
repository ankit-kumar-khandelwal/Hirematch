document.addEventListener('DOMContentLoaded', function () {
    const xhrSkills = new XMLHttpRequest();
    xhrSkills.open('GET', 'fetchskills.php', true);

    xhrSkills.onload = function () {
        if (xhrSkills.status === 200) {
            const skillsData = JSON.parse(xhrSkills.responseText);

            // Assuming the data represents the skills information
            const skillsContent = document.getElementById('skillsContent');
            skillsContent.innerHTML = `
                <ul>
                    <li>
                        <strong>Current Position:</strong>${skillsData[0].CurrentPosition}<br>
                        <!-- Add other skill-related properties here if needed -->
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

            // You can call the populateContent function for skills as needed
            populateContent('skillsContent', skillsData[0]);

        } else {
            console.error('Error fetching skills data:', xhrSkills.statusText);
        }
    };

    xhrSkills.send();
});
