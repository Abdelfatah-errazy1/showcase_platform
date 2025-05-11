<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $subject ?? 'Notification' }}</title>
</head>
<body style="background-color: #f8f9fa; font-family: Arial, sans-serif; padding: 20px; margin: 0;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 5px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="text-align: center; padding: 20px;">
            <img style="max-width: 100px;" src="https://ezdpro.com/images/ezd.png" alt="Logo">
        </div>
        <div style="padding: 20px;">
            <h1 style="font-size: 24px; color: #333;">{{ $greeting ?? 'Hello! Errazy' }}</h1>
            @foreach ($introLines as $line)
                <p style="font-size: 16px; color: #555;">{{ $line }}</p>
            @endforeach
            @isset($actionText)
                <div style="text-align: center; margin: 20px 0;">
                    <a href="{{ $actionUrl }}" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; font-weight: bold; border-radius: 5px;">{{ $actionText }}</a>
                </div>
            @endisset
            @foreach ($outroLines as $line)
                <p style="font-size: 16px; color: #555;">{{ $line }}</p>
            @endforeach
        </div>
        <div style="text-align: center; padding: 20px; background-color: #f8f9fa; font-size: 14px; color: #888;">
            <p>Sent with ❤️ from EZD.</p>
            <p>EZD, Morocco, Fez<br></p>
        </div>
    </div>
</body>
</html>
