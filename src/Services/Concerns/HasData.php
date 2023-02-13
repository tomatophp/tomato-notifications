<?php


namespace TomatoPHP\TomatoNotifications\Services\Concerns;


trait HasData
{
    /**
     * @var int|null
     */
    private ?string $data = null;

    /**
     * @param string $data
     * @return $this
     */
    public function data(string $data): static
    {
        $this->data = $data;
        return $this;
    }
}
