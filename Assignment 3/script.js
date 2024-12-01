async function fetchData() {
    const url = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';

    try {
        const response = await fetch(url);
        const data = await response.json();

        // Check if data and results are available
        if (data?.results?.length) {
            const tableBody = document.getElementById('data-table-body');
            data.results.forEach(record => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${record.year || 'N/A'}</td>
                    <td>${record.semester || 'N/A'}</td>
                    <td>${record.the_programs || 'N/A'}</td>
                    <td>${record.nationality || 'N/A'}</td>
                    <td>${record.colleges || 'N/A'}</td>
                    <td>${record.number_of_students || 'N/A'}</td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            console.log("No valid data found.");
        }
    } catch (error) {
        console.error('Fetch error:', error);
    }
}

window.onload = fetchData;
