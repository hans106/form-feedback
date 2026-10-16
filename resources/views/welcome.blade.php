<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#f5f2ed">
        <title>Kirim masukan · Ruang Dengar</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <main class="feedback-page">
            <div class="feedback-shell">
                <header class="site-header">
                    <a class="brand" href="{{ route('feedback.create') }}" aria-label="Ruang Dengar, halaman utama">
                        <span class="brand-mark" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 20 20" fill="none">
                                <path d="M3 10.4c2.2-4.2 4.4-4.2 6.6 0s4.4 4.2 7.4-.8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                <circle cx="3" cy="10.4" r="1.2" fill="currentColor" />
                                <circle cx="17" cy="9.6" r="1.2" fill="currentColor" />
                            </svg>
                        </span>
                        <span>ruang dengar</span>
                    </a>
                    <span class="header-note">Satu pesan bisa membuat beda.</span>
                </header>

                <section class="feedback-card" aria-labelledby="page-title">
                    <div class="intro-panel">
                        <div>
                            <span class="eyebrow"><span class="eyebrow-dot"></span> Kami membaca semuanya</span>
                            <div class="intro-copy">
                                <h1 id="page-title">Ada yang ingin <span>kamu sampaikan?</span></h1>
                                <p>Ide, hal kecil yang mengganggu, atau sesuatu yang terasa pas—ceritakan saja. Masukanmu membantu kami tumbuh dengan lebih baik.</p>
                            </div>
                        </div>
                        <aside class="quote-card" aria-label="Catatan">
                            <p>“Yang paling berguna bukan pujian, tapi kejujuran yang disampaikan dengan baik.”</p>
                            <span>Catatan kecil dari tim kami</span>
                        </aside>
                    </div>

                    <div class="form-panel">
                        <div class="form-heading">
                            <h2>Kirim masukan</h2>
                            <p>Isi beberapa hal di bawah. Tidak perlu panjang-panjang.</p>
                        </div>

                        @if (session('success'))
                            <div class="form-alert" role="status" aria-live="polite">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="form-alert form-alert--error" role="alert" aria-live="assertive">
                                Ada beberapa bagian yang perlu diperiksa. Pesanmu belum terkirim.
                            </div>
                        @endif

                        <form class="feedback-form" method="POST" action="{{ route('feedback.store') }}">
                            @csrf

                            <div class="field-row">
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

                            <fieldset class="field">
                                <legend>Bagaimana pengalamanmu sejauh ini?</legend>
                                <div class="sentiment-options">
                                    <div class="sentiment-option">
                                        <input id="sentiment-great" type="radio" name="sentiment" value="great" @checked(old('sentiment') === 'great') required @if ($errors->has('sentiment')) aria-describedby="sentiment-error" @endif>
                                        <label for="sentiment-great"><span aria-hidden="true"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.4"/><circle cx="7.5" cy="8.5" r=".7" fill="currentColor"/><circle cx="12.5" cy="8.5" r=".7" fill="currentColor"/><path d="M6.8 11.2c.7 1.4 1.8 2.1 3.2 2.1s2.5-.7 3.2-2.1" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></span>Menyenangkan</label>
                                    </div>
                                    <div class="sentiment-option">
                                        <input id="sentiment-okay" type="radio" name="sentiment" value="okay" @checked(old('sentiment') === 'okay') required @if ($errors->has('sentiment')) aria-describedby="sentiment-error" @endif>
                                        <label for="sentiment-okay"><span aria-hidden="true"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.4"/><circle cx="7.5" cy="8.5" r=".7" fill="currentColor"/><circle cx="12.5" cy="8.5" r=".7" fill="currentColor"/><path d="M7.2 12h5.6" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></span>Biasa saja</label>
                                    </div>
                                    <div class="sentiment-option">
                                        <input id="sentiment-rough" type="radio" name="sentiment" value="rough" @checked(old('sentiment') === 'rough') required @if ($errors->has('sentiment')) aria-describedby="sentiment-error" @endif>
                                        <label for="sentiment-rough"><span aria-hidden="true"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.4"/><circle cx="7.5" cy="8.5" r=".7" fill="currentColor"/><circle cx="12.5" cy="8.5" r=".7" fill="currentColor"/><path d="M6.8 13.3c.7-1.4 1.8-2.1 3.2-2.1s2.5.7 3.2 2.1" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></span>Perlu dibenahi</label>
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

                            <button class="submit-button" type="submit">
                                <span>Kirim masukan</span>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                    <path d="M3 8h9m-4-4 4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <p class="privacy-note">Emailmu hanya kami gunakan jika ingin membalas masukan ini.</p>
                        </form>
                    </div>
                </section>

                <footer class="site-footer">Dibuat dengan perhatian, dan ruang untuk jadi lebih baik.</footer>
            </div>
        </main>
    </body>
</html>
