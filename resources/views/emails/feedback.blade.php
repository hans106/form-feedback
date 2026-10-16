<h1>Masukan baru masuk</h1>

<p><strong>Nama:</strong> {{ $feedback['name'] }}</p>
<p><strong>Email:</strong> {{ $feedback['email'] }}</p>
<p><strong>Kategori:</strong> {{ ['question' => 'Masukan umum', 'bug' => 'Laporan kendala', 'idea' => 'Ide fitur'][$feedback['category']] }}</p>
<p><strong>Pengalaman:</strong> {{ ['great' => 'Menyenangkan', 'okay' => 'Biasa saja', 'rough' => 'Perlu dibenahi'][$feedback['sentiment']] }}</p>

<p><strong>Cerita:</strong></p>
<p>{!! nl2br(e($feedback['message'])) !!}</p>
