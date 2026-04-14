<!-- Requirements -->
<div class="bg-gray-50 border border-gray-100 p-12 relative group">
    <div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 -mr-8 -mt-8 rounded-full"></div>
    <div class="relative z-10">
        <div class="flex items-center gap-4 mb-10 border-b border-gray-200 pb-6">
            <span class="material-symbols-outlined text-primary text-3xl">assignment</span>
            <h3 class="text-2xl font-headline font-bold text-on-surface italic">Persyaratan</h3>
        </div>
        <ul class="space-y-6">
            @if($ppdb?->persyaratan)
                @foreach($ppdb->persyaratan as $item)
                    <li class="flex items-center gap-4 group/item">
                        <span class="w-1.5 h-1.5 bg-primary/30 rounded-full group-hover/item:scale-150 transition-transform"></span>
                        <span class="text-lg font-body text-gray-600 font-light leading-snug">{{ $item }}</span>
                    </li>
                @endforeach
            @endif
        </ul>
        
        <div class="mt-16 pt-8 border-t border-gray-200">
            <p class="text-[10px] font-subhead font-bold text-gray-400 uppercase tracking-widest mb-6">Informasi Lebih Lanjut</p>
            <div class="space-y-4">
                @if($ppdb?->kontak)
                    @foreach($ppdb->kontak as $platform => $value)
                        <div class="flex items-center gap-4">
                            <span class="text-primary font-subhead font-bold text-[10px] uppercase tracking-widest w-20">{{ $platform }}</span>
                            <span class="font-body font-light text-gray-600 text-sm">{{ $value }}</span>
                        </div>
                    @endforeach
                @endif
            </div>

            {{-- CTA Daftar --}}
            <div class="mt-10 pt-8 border-t border-gray-100">
                <p class="text-sm font-body text-gray-500 mb-5 leading-relaxed">
                    Sudah siap? Lengkapi formulir pendaftaran online sekarang dan jadilah bagian dari keluarga besar SMA Harapan Jaya.
                </p>
                <a href="{{ route('ppdb.form') }}"
                    class="inline-flex items-center gap-3 bg-primary text-white px-8 py-4 font-subhead uppercase tracking-[0.2em] text-xs transition hover:bg-[#006b35]">
                    <span class="material-symbols-outlined text-base">edit_document</span>
                    Mulai Pendaftaran Online
                </a>
            </div>
        </div>
    </div>
</div>

