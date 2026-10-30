<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#f2f3ed">
        <title>Kirim masukan · Form Feedback</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            {!! file_get_contents(resource_path('views/welcome.css')) !!}
        </style>
    </head>
    <body>
        <main class="feedback-layout">
            <header class="feedback-header">
                <a class="feedback-brand" href="{{ route('feedback.create') }}" aria-label="Form Feedback, halaman utama">
                    <span class="brand-mark" aria-hidden="true">F</span>
                    <span>FORM FEEDBACK</span>
                </a>
                <span class="header-note">Setiap suara berarti</span>
            </header>

            <section class="feedback-intro" aria-labelledby="page-title">
                <div class="intro-topline">
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Kami membaca semuanya</span>
                    <span class="intro-index">RUANG UNTUK BERTUMBUH</span>
                </div>

                <div class="intro-content">
                    <p class="intro-kicker">Cerita kecil, perubahan nyata</p>
                    <h1 id="page-title">Ada yang ingin<br><span>kamu sampaikan?</span></h1>
                    <p class="intro-description">
                        Ide, hal yang mengganggu, atau sesuatu yang terasa pas—ceritakan saja.
                        Masukanmu membantu kami tumbuh lebih baik.
                    </p>
                </div>

                <div class="feedback-details">
                    <div class="feedback-detail">
                        <span class="detail-number">01</span>
                        <strong>Saran</strong>
                    </div>
                    <div class="feedback-detail">
                        <span class="detail-number">02</span>
                        <strong>Kendala</strong>
                    </div>
                    <div class="feedback-detail">
                        <span class="detail-number">03</span>
                        <strong>Ide baru</strong>
                    </div>
                </div>

                <span class="intro-mark" aria-hidden="true">✳</span>
            </section>

            <section class="feedback-form-panel" aria-labelledby="form-title">
                @if (session('success'))
                    <div class="submission-success" role="status" aria-live="polite">
                        <span class="success-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="m6 12.5 4 4L18.5 8" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <div class="success-copy">
                            <span class="success-label">BERHASIL DIKIRIM</span>
                            <p>{{ session('success') }}</p>
                            <span class="success-note">Terima kasih sudah meluangkan waktu untuk berbagi.</span>
                        </div>
                        <span class="success-decoration" aria-hidden="true">✳</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="form-alert form-alert--error" role="alert" aria-live="assertive">
                        <p>Ada beberapa bagian yang perlu diperiksa. Pesanmu belum terkirim.</p>
                    </div>
                @endif

                <div class="panel-heading">
                    <span class="panel-step" aria-hidden="true">01</span>
                    <div>
                        <p class="section-label">Ceritakan kepada kami</p>
                        <h2 id="form-title">Kirim masukan</h2>
                    </div>
                </div>

                <form class="submission-form" method="POST" action="{{ route('feedback.store') }}">
                    @csrf

                    <div class="form-row">
                        <div class="field">
                            <label for="name">Nama</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Nama panggilan juga boleh" autocomplete="name" maxlength="100" required @if ($errors->has('name')) aria-invalid="true" aria-describedby="name-error" @endif>
                            @error('name')
                                <span class="field-error" id="name-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="kamu@email.com" autocomplete="email" maxlength="254" required @if ($errors->has('email')) aria-invalid="true" aria-describedby="email-error" @endif>
                            @error('email')
                                <span class="field-error" id="email-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label for="category">Kamu ingin menyampaikan apa?</label>
                        <select id="category" name="category" required @if ($errors->has('category')) aria-invalid="true" aria-describedby="category-error" @endif>
                            <option value="" disabled @selected(old('category') === null)>Pilih yang paling sesuai</option>
                            <option value="question" @selected(old('category') === 'question')>Masukan umum</option>
                            <option value="bug" @selected(old('category') === 'bug')>Laporan kendala</option>
                            <option value="idea" @selected(old('category') === 'idea')>Ide fitur</option>
                        </select>
                        @error('category')
                            <span class="field-error" id="category-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <fieldset class="field sentiment-field">
                        <legend>Bagaimana pengalamanmu sejauh ini?</legend>
                        <div class="sentiment-options">
                            <div class="sentiment-option">
                                <input id="sentiment-great" type="radio" name="sentiment" value="great" @checked(old('sentiment') === 'great') required @if ($errors->has('sentiment')) aria-describedby="sentiment-error" @endif>
                                <label for="sentiment-great"><span aria-hidden="true">☺</span>Menyenangkan</label>
                            </div>
                            <div class="sentiment-option">
                                <input id="sentiment-okay" type="radio" name="sentiment" value="okay" @checked(old('sentiment') === 'okay') required @if ($errors->has('sentiment')) aria-describedby="sentiment-error" @endif>
                                <label for="sentiment-okay"><span aria-hidden="true">◉</span>Biasa saja</label>
                            </div>
                            <div class="sentiment-option">
                                <input id="sentiment-rough" type="radio" name="sentiment" value="rough" @checked(old('sentiment') === 'rough') required @if ($errors->has('sentiment')) aria-describedby="sentiment-error" @endif>
                                <label for="sentiment-rough"><span aria-hidden="true">☹</span>Perlu dibenahi</label>
                            </div>
                        </div>
                        @error('sentiment')
                            <span class="field-error" id="sentiment-error">{{ $message }}</span>
                        @enderror
                    </fieldset>

                    <div class="field">
                        <label for="message">Ceritakan sedikit</label>
                        <textarea id="message" name="message" placeholder="Apa yang berjalan baik, atau apa yang sebaiknya kami perbaiki?" minlength="15" maxlength="3000" required @if ($errors->has('message')) aria-invalid="true" aria-describedby="message-error" @endif>{{ old('message') }}</textarea>
                        @error('message')
                            <span class="field-error" id="message-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button class="submit-button" type="submit">
                            <span>Kirim masukan</span>
                            <span class="button-arrow" aria-hidden="true">↗</span>
                        </button>
                    </div>
                </form>

                <p class="privacy-note">Emailmu hanya kami gunakan jika ingin membalas masukan ini.</p>
            </section>
        </main>
    </body>
</html>
