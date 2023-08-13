<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    /**
     * @var array
     */
    protected array $queryParams = [];

    /**
     * @param $queryParams
     */
    public function __construct($queryParams)
    {
        $this->queryParams = $queryParams;
    }

    /**
     * @return array
     */
    abstract protected function getCallbacks(): array;

    /**
     * @param Builder $builder
     * @return void
     */
    public function apply(Builder $builder): void
    {
        foreach($this->getCallbacks() as $cbName => $cbValue) {
            if (isset($this->queryParams[$cbName])) {
                call_user_func($cbValue, $builder, $this->queryParams[$cbName]);
            }
        }
    }

    /**
     * @return void
     */
    protected function clearQueryParams(): void
    {
        if (!empty($this->queryParams)) {
            $this->queryParams = [];
        }
    }
}
