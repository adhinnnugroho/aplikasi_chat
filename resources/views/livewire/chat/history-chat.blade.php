<div>

    @if (is_null($history_chat))
    @else
        @livewire('chats.handle-value-chat', [
            'chat_id' => $history_chat->id,
            'selectedContactId' => $selectedContactId,
        ])
    @endif





    <div class="border-b-2 bg-gray-200 w-full p-4 bottom-0 fixed">
        <div class="flex flex-wrap gap-6" x-data="{ inputValue: '{{ $chatvalue }}' }">
            <i class="fas fa-plus text-2xl text-gray-500 mt-1"></i>

            <textarea rows="1" class="bg-gray-300 rounded-lg w-[63rem] px-4 py-2 focus:border-gray-300" type="text"
                placeholder="Ketik pesan Anda..." id="send_message" x-ref="input" x-model="inputValue" wire:model.lazy="chatvalue"
                @keydown.enter="submitForm" x-on:keyup="adjustInputHeight"   style="height: 50px;">
            </textarea>
            <i class="fas fa-microphone text-2xl float-right mt-1 fixed right-7 text-gray-500 cursor-pointer"></i>
        </div>
    </div>

    @push('scripts')
        <script>
            function submitForm() {
                Livewire.dispatch('savedChat')
            }
        </script>
        <script>
            function adjustInputHeight(event) {
                var input = event.target;
                var scrollHeight = input.scrollHeight;
                var clientHeight = input.clientHeight;
                var inputWidth = input.offsetWidth;
                // var cursorPosition = input.value.length;
                var cursorPosition = getCaretCharacterOffsetWithin(input);
                var threshold = 10;
                var chunkSize = 50;
                console.log(input.scrollHeight + 'px');

                if (event.key === "Backspace" || event.keyCode === 8) {
                    var lines = input.value.split('\n');

                    // Jika kursor di awal teks dan pada baris pertama, tidak perlu manipulasi teks
                    if (cursorPosition === 0 && lines.length === 1) {
                        return;
                    }

                    var currentLine = lines[cursorPosition];
                    var previousLine = lines[cursorPosition - 1] || '';

                    // Jika kursor di awal teks atau pada baris pertama, hapus karakter sebelumnya
                    if (cursorPosition === 0) {
                        input.value = input.value.substring(0, cursorPosition) + input.value.substring(cursorPosition + 1);
                        input.setSelectionRange(cursorPosition, cursorPosition);
                    } else {
                        input.value = lines.slice(0, cursorPosition - 1).join('\n') + previousLine + currentLine;
                        input.setSelectionRange(previousLine.length, previousLine.length);
                    }
                } else if ((cursorPosition * 4) + 50 >= ((inputWidth / 2) - threshold)) {
                    // Memecah teks menjadi dua bagian: sebelum dan setelah posisi kursor
                    var beforeInsert = input.value.substring(0, cursorPosition);
                    var afterInsert = input.value.substring(cursorPosition);

                    // Menemukan posisi newline sebelumnya
                    var lastNewline = beforeInsert.lastIndexOf('\n');
                    // Menemukan posisi awal dari blok teks terakhir yang ditambahkan
                    var startOfLastBlock = lastNewline + 1;

                    // Menghitung posisi kursor setelah penambahan newline
                    var newPosition = cursorPosition + 1;

                    // Jika kita sudah melebihi chunkSize, geser kursor ke awal blok terakhir
                    if (((cursorPosition * 4) + 50) - startOfLastBlock >= ((cursorPosition * 4) + 50)) {
                        // Menyesuaikan posisi kursor berdasarkan newline terakhir
                        newPosition = startOfLastBlock + ((cursorPosition * 4) + 50) + 1;
                    }

                    // Menambahkan newline pada posisi yang dihitung
                    input.value = beforeInsert.substring(0, newPosition) + '\n' + afterInsert;

                    // Menetapkan posisi kursor yang benar setelah penyisipan newline
                    input.setSelectionRange(newPosition + 1, newPosition + 1);

                    input.style.height = 'auto';
                    // Menyesuaikan tinggi input
                    // input.style.height = input.scrollHeight + 'px';
                    var totalRows = input.value.split('\n').length;
                    console.log(input.rows = totalRows);

                    // Geser ke bawah untuk menunjukkan baris terakhir
                    input.scrollTop = input.scrollHeight;

                }
            }

            function getCaretCharacterOffsetWithin(element) {
                var caretOffset = 0;
                var doc = element.ownerDocument || element.document;
                var win = doc.defaultView || doc.parentWindow;
                var sel;

                if (typeof win.getSelection != "undefined") {
                    sel = win.getSelection();
                    if (sel.rangeCount > 0) {
                        var range = win.getSelection().getRangeAt(0);
                        var preCaretRange = range.cloneRange();
                        preCaretRange.selectNodeContents(element);
                        preCaretRange.setEnd(range.endContainer, range.endOffset);
                        caretOffset = preCaretRange.toString().length;
                    }
                } else if ((sel = doc.selection) && sel.type != "Control") {
                    var textRange = sel.createRange();
                    var preCaretTextRange = doc.body.createTextRange();
                    preCaretTextRange.moveToElementText(element);
                    preCaretTextRange.setEndPoint("EndToEnd", textRange);
                    caretOffset = preCaretTextRange.text.length;
                }

                return caretOffset;
            }
        </script>
    @endpush
</div>
