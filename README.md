# laravel-repository

Cópia do pacote https://github.com/artesaos/warehouse 

Ajustado para funcionar com laravel 7.

## Como usar

Retirado de https://github.com/artesaos/warehouse 

Warehouse v2 é um pacote base, ele implementa o básico sem nenhuma regra de negócio definida.
Há duas classes base: `BaseRepository` e `AbstractCrudRepository`

### BaseRepository
Esta classe implementa o contrato `BaseRepository`, que possui três assinaturas:

```php
 /**
  * Returns all records.
  * If $take is false then brings all records
  * If $paginate is true returns Paginator instance.
  *
  * @param int  $take
  * @param bool $paginate
  *
  * @return EloquentCollection|Paginator
  */
  public function getAll($take = 15, $paginate = true);
```

```php
/**
 * Retrieves a record by his id
 * If $fail is true fires ModelNotFoundException. When no record is found.
 *
 * @param int     $id
 * @param bool $fail
 *
 * @return Model
 */
 public function findByID($id, $fail = true);
```

```php
/**
 * @param string $column
 * @param string|null $key
 *
 * @return \Illuminate\Support\Collection|array
 */
public function lists($column, $key = null);
```

Já na implementação, `BaseRepository` disponibiliza dois métodos protegidos `newQuery()` e `doQuery($query = null, $take = 15, $paginate = true)`. Eles são amplamente usados nos repositórios.

#### newQuery

*newQuery* retorna um objeto [QueryBuilder](https://github.com/laravel/framework/blob/5.1/src/Illuminate/Database/Eloquent/Builder.php) do eloquent, à partir da propriedade `modelClass`.

```php
protected function newQuery()
{
    return app()->make($this->modelClass)->newQuery();
}
```

> Essa propriedade precisa ser definida em todos as classes repositório

#### doQuery

*doQuery* processa a query e retorna uma collection ou um objeto paginate, dependendo dos parametros passados

```php
protected function doQuery($query = null, $take = 15, $paginate = true)
{
    if (is_null($query)) {
        $query = $this->newQuery();
    }

    if (true == $paginate):
        return $query->paginate($take);
    endif;

    if ($take > 0 || false != $take) {
        $query->take($take);
    }

    return $query->get();
}
```
