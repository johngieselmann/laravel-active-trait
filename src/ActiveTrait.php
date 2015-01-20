<?php

trait ActiveTrait {

    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootActiveTrait()
    {
        static::addGlobalScope(new ActiveScope);
    }

    /**
     * Get the name of the column for applying the scope.
     *
     * @return string
     */
    public function getActiveColumn()
    {
        return defined('static::ACTIVE_COLUMN')
            ? static::ACTIVE_COLUMN
            : 'active';
    }

    /**
     * Get the fully qualified column name for applying the scope.
     *
     * @return string
     */
    public function getQualifiedActiveColumn()
    {
        return $this->getTable() . '.' . $this->getActiveColumn();
    }

    /**
     * Get the query builder without the scope applied.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function withInactive()
    {
        return with(new static)->newQueryWithoutScope(new ActiveScope);
    }

}
