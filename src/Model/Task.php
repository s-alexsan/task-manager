<?php

namespace SAlexsan\TaskManager\Model;

use SAlexsan\TaskManager\Traits\HasFormattedDate;
use DateTime;
class Tasks 
{
    use HasFormattedDate;

    private int $id;
    private string $title;
    private string $description;
    private string $status;
    private DateTime $createdAt;
    
    public function __construct(string $title, string $description = "")
    {
        $this->id = uniqid();
        $this->title = $title;
        $this->description = $description;
        $this->status = "pendente";
        $this->createdAt = new DateTime();
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getTitle(): string 
    {
        return $this->title;
    }

    public function getDescription(): string 
    {
        return $this->description;
    }

    public function markAsInProgess()
    {
        $this->status = 'pendente';
    }
    
    public function maskAsCompleted()
    {
        $this->status = 'concluída';
    }

    public function __toString()
    {
        return "Tasks: {
            id: $this->id,
            title: $this->title,
            description: $this->description,
            status: $this->status,
            createdAt: {$this->formatDate($this->createdAt)}
        }";
    }
}