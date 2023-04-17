<?php

namespace App\Class;

use Symfony\Component\HttpFoundation\Request;

class Meta
{
    private Request $request;
    private array $metaData;
    
    public function __construct(string $itemsPerPage)
    {
        $this->metaData = [];
        $this->itemsPerPage = intval($itemsPerPage);
        $this->currentPage = 1;
    }
    
    public function getMetaData(): array
    {
        return [
            'currentPage' => $this->currentPage,
            'totalItems' => $this->totalItems,
            'itemsPerPage' => $this->itemsPerPage,
            'totalPages' => $this->totalPages,
        ];
    }
    
    public function setMetaData(Request $request, int $totalItems): void
    {
        $this->request = $request;
        $this->setCurrentPage();
        $this->setTotalItems($totalItems);
        $this->setItemsPerPage();
        $this->setTotalPages();
    }
    
    public function __set(string $name, mixed $value): void
    {
        $this->metaData[$name] = $value;
    }
    
    public function __get(string $name): mixed
    {
        return $this->metaData[$name] ?? null;
    }
    
    private function setCurrentPage(): void
    {
        $page = $this->request->get('page');
        if ($page !== null) {
            $this->currentPage = intval($page);
        }
    }
    
    private function setTotalItems(int $totalItems): void
    {
        $this->totalItems = $totalItems;
    }
    
    private function setItemsPerPage(): void
    {
        $perPage = $this->request->get('per_page');
        if ($perPage !== null) {
            $this->itemsPerPage = intval($perPage);
        }
    }
    
    private function setTotalPages(): void
    {
        if ($this->totalItems === 0 || $this->itemsPerPage === 0) {
            $this->totalPages = 1;
            return;
        }
        $this->totalPages = ceil($this->totalItems / $this->itemsPerPage);
    }
}
