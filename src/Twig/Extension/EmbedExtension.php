<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\Embed\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class EmbedExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('embed', [$this, 'embed']),
        ];
    }

    public function embed(string $source): string
    {
        $data = (string) file_get_contents($source);
        $data = 'data:'.$this->getMimeType($data).';base64,'.base64_encode($data);

        return $data;
    }

    private function getMimeType(string $data): string
    {
        $fileInfo = finfo_open();
        $mimeType = finfo_buffer($fileInfo, $data, FILEINFO_MIME_TYPE);
        finfo_close($fileInfo);

        return $mimeType;
    }
}
