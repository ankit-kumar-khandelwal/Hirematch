document.addEventListener('DOMContentLoaded', function () {
    const xhrEducation = new XMLHttpRequest();
    xhrEducation.open('GET', 'fetcheducation.php', true);

    xhrEducation.onload = function () {
        if (xhrEducation.status === 200) {
            const educationData = JSON.parse(xhrEducation.responseText);

            // Populate education content
            const educationSidebar = document.getElementById('educationContent');
            educationSidebar.innerHTML = `
                <h3>Education</h3>
                <ul>
                    ${educationData.map(item => `
                        <li>
                            <strong>University:</strong> ${item.UniversityName}<br>
                            <strong>Degree:</strong> ${item.Degree}<br>
                            <strong>Graduation Year:</strong> ${item.GraduationYear}
                        </li>
                    `).join('')}
                </ul>
            `;

            // Function to populate content dynamically
            const populateContent = (containerId, dataArray) => {
                const container = document.getElementById(containerId);
                container.innerHTML = ''; // Clear existing content
                dataArray.forEach(data => {
                    const contentItem = document.createElement('div');
                    contentItem.classList.add('content-item');
                    const keys = Object.keys(data);
                    keys.forEach(key => {
                        contentItem.innerHTML += `<p><strong>${key}:</strong> ${data[key]}</p>`;
                    });
                    container.appendChild(contentItem);
                });
            };

            // You can call the populateContent function for education as needed
            populateContent('educationContent', educationData);

        } else {
            console.error('Error fetching education data:', xhrEducation.statusText);
        }
    };

    xhrEducation.send();
});
