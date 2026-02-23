<?php

declare(strict_types=1);

namespace Endroid\Embed\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class EmbedExtension extends AbstractExtension
{
    #[\Override]
    public function getFunctions(): array
    {
        return [
            new TwigFunction('embed', [$this, 'embed']),
        ];
    }

    public function embed(string $source): string
    {
        $data = (string) file_get_contents($source);

        return 'data:' . $this->getMimeType($data) . ';base64,' . base64_encode($data);
    }

    private function getMimeType(string $data): string
    {
        $mimeType = new \finfo(FILEINFO_MIME_TYPE)->buffer($data);

        if (false === $mimeType) {
            throw new \Exception('Could not retrieve mime type');
        }

        return $mimeType;
    }
}
