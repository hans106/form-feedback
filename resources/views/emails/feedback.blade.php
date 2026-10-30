<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <title>Masukan baru masuk</title>
</head>
<body style="margin:0; padding:0; background-color:#f2f3ed; color:#193b34; font-family:Arial, Helvetica, sans-serif;">
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse; background-color:#f2f3ed;">
        <tr>
            <td align="center" style="padding:36px 16px;">
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="width:100%; max-width:600px; border-collapse:separate; border-spacing:0;">
                    <tr>
                        <td style="padding:0 0 18px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse;">
                                <tr>
                                    <td style="font-size:12px; font-weight:bold; letter-spacing:2px; color:#193b34;">
                                        <span style="display:inline-block; width:28px; height:28px; line-height:28px; margin-right:8px; border-radius:9px; background-color:#c9f36a; color:#193b34; text-align:center; font-size:14px; letter-spacing:0;">F</span>
                                        FORM FEEDBACK
                                    </td>
                                    <td align="right" style="font-size:11px; color:#65756e;">Pesan baru</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="overflow:hidden; border-radius:18px 18px 0 0; background-color:#193b34; padding:30px 34px 28px;">
                            <p style="margin:0 0 12px; color:#c9f36a; font-size:10px; font-weight:bold; letter-spacing:2px; text-transform:uppercase;">Ada suara baru untuk didengar</p>
                            <h1 style="margin:0; color:#f4f4eb; font-size:30px; line-height:1.2; letter-spacing:-1px;">Masukan baru masuk</h1>
                            <p style="margin:10px 0 0; color:#ced9d0; font-size:14px; line-height:1.6;">Seseorang telah berbagi cerita dan pengalaman.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #e1e6dc; border-top:0; border-radius:0 0 18px 18px; background-color:#fffefa; padding:28px 34px 32px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse;">
                                <tr>
                                    <td style="padding:0 0 16px; border-bottom:1px solid #e8ece4;">
                                        <p style="margin:0 0 5px; color:#819087; font-size:10px; font-weight:bold; letter-spacing:1.4px; text-transform:uppercase;">Nama</p>
                                        <p style="margin:0; color:#193b34; font-size:15px; font-weight:bold; line-height:1.5;">{{ $feedback['name'] }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:15px 0 16px; border-bottom:1px solid #e8ece4;">
                                        <p style="margin:0 0 5px; color:#819087; font-size:10px; font-weight:bold; letter-spacing:1.4px; text-transform:uppercase;">Email untuk dibalas</p>
                                        <p style="margin:0; font-size:14px; line-height:1.5;"><a href="mailto:{{ $feedback['email'] }}" style="color:#426c4d; text-decoration:underline;">{{ $feedback['email'] }}</a></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:15px 0 16px; border-bottom:1px solid #e8ece4;">
                                        <p style="margin:0 0 8px; color:#819087; font-size:10px; font-weight:bold; letter-spacing:1.4px; text-transform:uppercase;">Kategori</p>
                                        <span style="display:inline-block; padding:6px 11px; border-radius:999px; background-color:#eef5df; color:#34573a; font-size:12px; font-weight:bold;">{{ ['question' => 'Masukan umum', 'bug' => 'Laporan kendala', 'idea' => 'Ide fitur'][$feedback['category']] }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:15px 0 0;">
                                        <p style="margin:0 0 8px; color:#819087; font-size:10px; font-weight:bold; letter-spacing:1.4px; text-transform:uppercase;">Pengalaman</p>
                                        <span style="display:inline-block; padding:6px 11px; border-radius:999px; background-color:#f4f3ec; color:#46584d; font-size:12px; font-weight:bold;">{{ ['great' => 'Menyenangkan', 'okay' => 'Biasa saja', 'rough' => 'Perlu dibenahi'][$feedback['sentiment']] }}</span>
                                    </td>
                                </tr>
                            </table>

                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top:24px; border-collapse:collapse;">
                                <tr>
                                    <td style="padding:18px 20px; border-left:3px solid #c9f36a; border-radius:0 10px 10px 0; background-color:#f5f7f0;">
                                        <p style="margin:0 0 9px; color:#65756e; font-size:10px; font-weight:bold; letter-spacing:1.4px; text-transform:uppercase;">Cerita</p>
                                        <p style="margin:0; color:#263d33; font-size:14px; line-height:1.75;">{!! nl2br(e($feedback['message'])) !!}</p>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:24px 0 0; padding-top:18px; border-top:1px solid #e8ece4; color:#819087; font-size:11px; line-height:1.6;">
                                Balas email ini untuk menanggapi pengirim feedback.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:18px 12px 0; color:#87958d; font-size:10px; line-height:1.6;">
                            Pesan otomatis dari Form Feedback.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
