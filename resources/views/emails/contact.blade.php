
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Us Message</title>
</head>
<body style="background-color: #f8f9fa; font-family: Arial, sans-serif; padding: 20px; margin: 0;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 5px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="padding: 20px; background-color: #007bff; color: #fff; text-align: center;">
            <h1>Contact Us Message</h1>
        </div>
        <div style="padding: 20px;">
            <h2 style="font-size: 20px; color: #333;">Hello,</h2>
            <p style="font-size: 16px; color: #555;">We have received a new message from Yuo on our website.</p>
            <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
                <tr>
                    <th style="text-align: left; padding: 8px; border: 1px solid #ddd;">Name</th>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $data['name'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th style="text-align: left; padding: 8px; border: 1px solid #ddd;">Email</th>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $data['email'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th style="text-align: left; padding: 8px; border: 1px solid #ddd;">Message</th>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $data['message'] ?? 'N/A' }}</td>
                </tr>
            </table>
            <p style="font-size: 16px; color: #555; margin-top: 20px">We will answer you as soon as possible.</p>

            <p style="font-size: 16px; color: #555; margin-top: 20px;">Thank you for using our application!</p>
        </div>
        <div style="padding: 20px; background-color: #f8f9fa; text-align: center; font-size: 14px; color: #888;">
            <p>Sent with ❤️ from EZD.</p>
            <p>EZD, Morocco , Fez</p>
        </div>
    </div>
</body>
</html>
