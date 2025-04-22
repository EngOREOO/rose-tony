<div class="max-w-xl mx-auto p-4 bg-white dark:bg-gray-900 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-3 text-center">📜 بيانات الفاتورة</h2>

    <div class="relative">
        <textarea 
            id="invoice-data" 
            class="w-full h-80 p-6 border border-gray-300 dark:border-gray-600 rounded-lg font-mono text-base bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-4 focus:ring-blue-400 focus:border-blue-500 outline-none transition-all resize-none shadow-sm"
            dir="rtl"
        >{{ $invoiceData }}</textarea>
    </div>

    <p class="mt-3 text-gray-600 dark:text-gray-300 text-center text-sm">🔹 اضغط على زر "نسخ" لحفظ البيانات في الحافظة.</p>
</div>


<script>
    function copyInvoiceData() {
        const textarea = document.getElementById('invoice-data');
        
        // تحديد النص بالكامل ونسخه
        textarea.select();
        textarea.setSelectionRange(0, 99999); // دعم إضافي للهواتف المحمولة
        navigator.clipboard.writeText(textarea.value).then(() => {
            // تغيير نص الزر مؤقتًا بعد النسخ
            const copyBtn = document.getElementById('copy-btn');
            copyBtn.innerHTML = '✅ تم النسخ';
            copyBtn.classList.remove('bg-blue-600');
            copyBtn.classList.add('bg-green-500');

            setTimeout(() => {
                copyBtn.innerHTML = '📋 نسخ';
                copyBtn.classList.remove('bg-green-500');
                copyBtn.classList.add('bg-blue-600');
            }, 2000);
        }).catch(() => alert('❌ حدث خطأ أثناء النسخ!'));
    }
</script>
