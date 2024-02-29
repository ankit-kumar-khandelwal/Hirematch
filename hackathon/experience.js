document.addEventListener('DOMContentLoaded', function () {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetchexperience.php', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);

            // Assuming the second row represents the experience data
            const experienceData = data[0]; // Assuming experience data is an object, not an array

            // Populate experience sidebar
            const experienceSidebar = document.getElementById('experienceContent');
            experienceSidebar.innerHTML = `
                <h3>Experience</h3>
                <ul>
                    <li>
                    <strong>Description:</strong> ${experienceData.Experience}<br>

                        <strong>Description:</strong> ${experienceData.DescriptionofPastRole}<br>
                        <strong>Programming Languages:</strong> ${experienceData.ProgrammingLanguages}<br>
                        <strong>Web Technologies:</strong> ${experienceData.WebTechnologies}
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
            populateContent('experienceContent', experienceData);

        } else {
            console.error('Error fetching data:', xhr.statusText);
        }
    };

    xhr.send();
});
