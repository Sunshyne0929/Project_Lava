<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diver Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/public/images/ss.jpg');
            background-size: cover;
            background-position: center;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 215vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        label {
            font-size: 1rem;
            color: #333;
            margin-bottom: 1px;
            display: inline-block;
        }

        input[type="text"], input[type="date"], select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            font-size: 1rem;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-group input[type="text"]:focus, .form-group select:focus, .form-group input[type="date"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .form-group textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .terms {
            font-size: 0.9rem;
            color: #555;
        }

        .terms input {
            margin-right: 10px;
        }

        .terms-and-conditions {
            font-size: 0.9rem;
            color: #555;
            margin-top: 20px;
        }

        .terms-and-conditions h4 {
            margin-top: 15px;
        }

        .terms-and-conditions p {
            margin: 5px 0;
        }
    </style>
    <script>
        function validateForm() {
            const termsCheckbox = document.getElementById("terms");
            const confirmCheckbox = document.getElementById("confirm-info");
            if (!termsCheckbox.checked || !confirmCheckbox.checked) {
                alert("You must agree to the Terms and Conditions and confirm that the information provided is accurate.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Diver Registration</h1>
        <form action="/pdf_success" method="GET" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" id="middle_name" name="middle_name">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" pattern="\d{10}" title="Enter a valid 10-digit phone number" required>
            </div>
            <div class="form-group">
                <label for="emergency_contact_number">Emergency Contact Number:</label>
                <input type="text" id="emergency_contact_number" name="emergency_contact_number" pattern="\d{10}" title="Enter a valid 10-digit phone number" required>
            </div>
            <div class="form-group">
                <label for="emergency_contact_person">Emergency Contact Person:</label>
                <input type="text" id="emergency_contact_person" name="emergency_contact_person" required>
            </div>
            <div class="form-group">
                <label for="experience">Experience:</label>
                <select id="experience" name="experience" required>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Professional">Professional</option>
                </select>
            </div>
            <div class="form-group">
                <label for="diving_certification">Diving Certification:</label>
                <select id="diving_certification" name="diving_certification" required>
                    <option value="None">None</option>
                    <option value="Open Water Diver">Open Water Diver</option>
                    <option value="Advanced Open Water Diver">Advanced Open Water Diver</option>
                    <option value="Rescue Diver">Rescue Diver</option>
                    <option value="Dive Master">Dive Master</option>
                    <option value="Instructor">Instructor</option>
                </select>
            </div>
            <div class="terms-and-conditions">
                <h3>Terms and Conditions</h3>
                <p>By participating in this scuba diving activity, you agree to the following terms:</p>
                <h4>Assumption of Risk:</h4>
                <p>You acknowledge that scuba diving involves inherent risks, including but not limited to physical injury, drowning, and accidents. You agree to voluntarily assume all risks associated with the activity.</p>
                <h4>Release of Liability:</h4>
                <p>You hereby release, indemnify, and hold harmless the diving facility, its employees, instructors, and the local government from any and all claims, actions, or liabilities, including but not limited to personal injury, property damage, or death that may arise from your participation in the scuba diving activity.</p>
                <h4>Medical Responsibility:</h4>
                <p>You certify that you are in good health and physically capable of participating in scuba diving activities. In case of injury, you understand that medical treatment will be at your own expense, and you accept responsibility for any medical costs incurred.</p>
                <h4>No Liability for Local Government:</h4>
                <p>You acknowledge that the local government and its agencies are not responsible for any injuries, accidents, or incidents that may occur during the scuba diving activity. You agree that the local government shall not be held liable for any damages to you or your property.</p>
                <h4>Acknowledgment of Terms:</h4>
                <p>By signing this agreement, you confirm that you have read, understood, and agreed to all terms and conditions.</p>
                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I agree to the Terms and Conditions.</label>
                </div>
            </div>

            <!-- Confirm information checkbox -->
            <div class="form-group terms">
                <input type="checkbox" id="confirm-info" name="confirm-info" required>
                <label for="confirm-info">I confirm that the information provided is accurate.</label>
            </div>

            <!-- Submit Button -->
            <button type="submit">Register</button>
        </form>
        <!-- End of form -->
    </div>
</body>
</html>
