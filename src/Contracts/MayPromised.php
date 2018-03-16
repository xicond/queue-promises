<?php

namespace Tochka\Queue\Promises\Contracts;

use Tochka\Queue\Promises\Jobs\Promise;

interface MayPromised
{
    const JOB_STATUS_SUCCESS = 'success';
    const JOB_STATUS_ERROR = 'error';

    /**
     * Получение уникального идентификатора отложенной задачи
     * @return string
     */
    public function getUniqueId(): string;

    /**
     * Связывает отложенную задачу с промисом
     *
     * @param Promise $promise
     */
    public function setPromise(Promise $promise);

    /**
     * Перехватывать или нет события завершения этой задачи
     * @return bool
     */
    public function hasResult(): bool;

    /**
     * Получает ID связанного промиса
     * @return int
     */
    public function getPromiseId(): int;

    /**
     * Устанавливает статус задачи
     *
     * @param $status
     */
    public function setJobStatus($status);

    /**
     * Возвращает статус задачи
     * @return string
     */
    public function getJobStatus(): string;

    /**
     * Сохраняет ошибки из задачи
     *
     * @param \Exception[]
     */
    public function setJobErrors(array $errors = []);

    /**
     * Возвращает ошибки из задачи
     * @return \Exception[]
     */
    public function getJobErrors(): array;
}