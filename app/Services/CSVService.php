<?php

namespace App\Services;

use Response;

class CSVService
{

	/**
	 * Generate and download csv file
	 *
	 * @param array $list
	 * @param array $header
	 * @param string $filename
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function download($list, $header, $filename)
	{
		if (count($header) > 0) {
			array_unshift($list, $header);
		}
		$stream = fopen('php://temp', 'r+b');
		foreach ($list as $row) {
			fputcsv($stream, $row);
		}
		rewind($stream);
		$csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
		$csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
		$headers = array(
			'Content-Type' => 'text/csv',
			'Content-Disposition' => "attachment; filename=\"$filename\"",
		);
		return \Response::make($csv, 200, $headers);
	}

}
