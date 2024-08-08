<?php if ($showHistory && isset($historyData)): ?>
    <div id="historyModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 overflow-y-auto h-full w-full flex items-center justify-center">
        <div class="relative bg-white rounded-lg shadow-lg w-11/12 md:w-3/4 lg:w-1/2">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl md:text-2xl font-bold text-gray-800">Book Edit History</h3>
            </div>
            <div id="historyContent" class="p-6 space-y-6 max-h-[60vh] overflow-y-auto">
                <?php foreach ($historyData as $history): ?>
                    <div class="history-item p-4 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100 transition-all duration-300">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <h4 class="text-lg font-semibold text-gray-700">Edited on: <span class="font-normal"><?= htmlspecialchars($history['updated_at']) ?></span></h4>
                            <h4 class="text-lg font-semibold text-gray-700">Title: <span class="font-normal"><?= htmlspecialchars($history['title']) ?></span></h4>
                            <h4 class="text-lg font-semibold text-gray-700">Author: <span class="font-normal"><?= htmlspecialchars($history['author']) ?></span></h4>
                            <h4 class="text-lg font-semibold text-gray-700">Publishing Date: <span class="font-normal"><?= htmlspecialchars($history['publishing_date']) ?></span></h4>
                        </div>
                        <p class="text-gray-600 mt-4">Summary: <?= htmlspecialchars($history['summary']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="flex justify-end p-4 border-t">
                <a href="/book?id=<?= $book['id'] ?>" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-all duration-300">Close</a>
            </div>
        </div>
    </div>
<?php endif; ?>