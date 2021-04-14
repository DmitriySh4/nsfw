<?php

namespace App\Components;

use App\Models\Advertisement;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

Class FileUploader 
{
	public function save($data, $advertisement_id) {
		$files = [$data->file('photo1'), $data->file('photo2'), $data->file('photo3')];

		foreach ($files as $file) {
			if (isset($file)) {
				$attach = new Attachment();
				$name = $file->getClientOriginalName();
				$uploadDir = 'public/photos/' . $advertisement_id;
				$file->storeAs($uploadDir, $name);
				$attach->fill(['path' => $uploadDir . '/' . $name, 'advertisement_id' => $advertisement_id]);
				$attach->save();
			}
		}
	}
}