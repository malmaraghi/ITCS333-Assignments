<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University of Bahrain Student Enrollment Data</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.5.7/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>University of Bahrain Student Enrollment by Nationality</h1>
        <table role="grid">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>The Programs</th>
                    <th>Nationality</th>
                    <th>Colleges</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
                $response = file_get_contents($URL);
                $data = json_decode($response, true);

                if (isset($data['results'])) {
                    foreach ($data['results'] as $record) {
                        echo "<tr>
                                <td>{$record['year']}</td>
                                <td>{$record['semester']}</td>
                                <td>{$record['the_programs']}</td>
                                <td>{$record['nationality']}</td>
                                <td>{$record['colleges']}</td>
                                <td>{$record['number_of_students']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
