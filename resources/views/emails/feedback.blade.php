<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <title>Masukan baru masuk</title>
    <style>
        {!! file_get_contents(resource_path('views/emails/feedback.css')) !!}
    </style>
</head>
<body class="email-body">
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" class="email-background">
        <tr>
            <td align="center" class="email-outer-cell">
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" class="email-container">
                    <tr>
                        <td class="email-brand-cell">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" class="email-brand-table">
                                <tr>
                                    <td class="email-brand">
                                        <span class="email-brand-mark">F</span>
                                        FORM FEEDBACK
                                    </td>
                                    <td align="right" class="email-brand-note">Pesan baru</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="email-hero">
                            <p class="email-eyebrow">Ada suara baru untuk didengar</p>
                            <h1 class="email-title">Masukan baru masuk</h1>
                            <p class="email-subtitle">Seseorang telah berbagi cerita dan pengalaman.</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="email-content">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" class="email-details">
                                <tr>
                                    <td class="detail-cell detail-cell-first">
                                        <p class="detail-label">Nama</p>
                                        <p class="detail-value detail-value-strong">{{ $feedback['name'] }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="detail-cell">
                                        <p class="detail-label">Email untuk dibalas</p>
                                        <p class="detail-value"><a href="mailto:{{ $feedback['email'] }}" class="email-link">{{ $feedback['email'] }}</a></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="detail-cell">
                                        <p class="detail-label">Kategori</p>
                                        <span class="email-badge">{{ ['question' => 'Masukan umum', 'bug' => 'Laporan kendala', 'idea' => 'Ide fitur'][$feedback['category']] }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="detail-cell detail-cell-last">
                                        <p class="detail-label">Pengalaman</p>
                                        <span class="email-badge email-badge-neutral">{{ ['great' => 'Menyenangkan', 'okay' => 'Biasa saja', 'rough' => 'Perlu dibenahi'][$feedback['sentiment']] }}</span>
                                    </td>
                                </tr>
                            </table>

                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" class="story-table">
                                <tr>
                                    <td class="story-cell">
                                        <p class="detail-label">Cerita</p>
                                        <p class="story-copy">{!! nl2br(e($feedback['message'])) !!}</p>
                                    </td>
                                </tr>
                            </table>

                            <p class="email-reply-note">
                                Balas email ini untuk menanggapi pengirim feedback.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" class="email-footer">
                            Pesan otomatis dari Form Feedback.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
