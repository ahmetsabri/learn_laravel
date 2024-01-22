<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadFileTest extends TestCase
{
    public function test_upload_file(): void
    {
        Storage::fake('local');

        $file = UploadedFile::fake()->create('cv.pdf', 1000);

        Storage::assertMissing('all_files/'.$file->hashName());
        Storage::assertDirectoryEmpty('all_files');

        $response = $this->postJson('api/files', [
            'my_file' => $file,
        ]);

        $response->assertSuccessful();
        Storage::assertExists('all_files/'.$file->hashName());
    }
}
