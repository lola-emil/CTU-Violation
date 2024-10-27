<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile Modal</title>
    <link rel="stylesheet" href="pstyles.css">
</head>
<body>
    <!-- Button to Open the Modal -->
    <button id="openModal">Open Student Profile</button>

    <!-- Modal Structure -->
    <div id="profileModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="profile-container">
                <div class="header">
                    <h1>Student Profile</h1>
                </div>
                <div class="profile-details">
                    <div class="profile-picture">
                        <img src="https://via.placeholder.com/100" alt="Profile Picture">
                    </div>
                    <div class="profile-info">
                        <p><strong>ID Number:</strong> 1234567</p>
                        <p><strong>Name:</strong> Juan DeLa Cruz</p>
                        <p><strong>Gender:</strong> Male</p>
                        <p><strong>Course:</strong> Information Technology</p>
                        <p><strong>Department:</strong> Technology</p>
                    </div>
                </div>
                <div class="violation-section">
                    <table>
                        <tr>
                            <th>Violation</th>
                            <th>Offense</th>
                            <th>Sanction</th>
                            <th>Time</th>
                        </tr>
                        <tr>
                            <td>
                                <select>
                                    <option value="Addict">Addict</option>
                                </select>
                            </td>
                            <td>Very Serious</td>
                            <td>1 week suspension</td>
                            <td>7 Days</td>
                        </tr>
                    </table>
                </div>
                <div class="buttons">
                    <button class="save">Save Changes</button>
                    <button class="print">Print</button>
                    <button class="cancel">Cancel</button>
                </div>
                <div class="history-section">
                    <h3>History of Violations</h3>
                    <p>No Records - Juan bait bata</p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="pscript.js"></script>
</body>
</html>
