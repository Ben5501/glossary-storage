<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Shared\ZedRequest\Client;

use SprykerEngine\Shared\Transfer\TransferInterface;

abstract class AbstractResponse extends AbstractObject implements EmbeddedTransferInterface, ResponseInterface
{

    /**
     * @var array
     */
    protected $values = [
        'messages' => [],
        'errorMessages' => [],
        'success' => true,
        'transfer' => null,
        'transferClassName' => null,
    ];

    /**
     * @param array $values
     */
    public function __construct(array $values = null)
    {
        parent::__construct($values);
    }

    /**
     * @param array $values
     */
    public function fromArray(array $values)
    {
        parent::fromArray($values);

        foreach ($this->values['messages'] as $key => $message) {
            $this->values['messages'][$key] = new Message($message);
        }

        foreach ($this->values['errorMessages'] as $key => $message) {
            $this->values['errorMessages'][$key] = new Message($message);
        }
    }

    /**
     * @return Message[]
     */
    public function getErrorMessages()
    {
        return $this->values['errorMessages'];
    }

    /**
     * @param string $messageString
     *
     * @return bool
     */
    public function hasErrorMessage($messageString)
    {
        $errorMessages = $this->getErrorMessages();
        foreach ($errorMessages as $errorMessage) {
            if ($errorMessage->getMessage() === $messageString) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array $errorMessages
     *
     * @return self
     */
    public function addErrorMessages(array $errorMessages)
    {
        foreach ($errorMessages as $errorMessage) {
            $this->addErrorMessage($errorMessage);
        }

        return $this;
    }

    /**
     * @param Message $errorMessage
     *
     * @return self
     */
    public function addErrorMessage(Message $errorMessage)
    {
        $this->values['errorMessages'][] = $errorMessage;

        return $this;
    }

    /**
     * @return Message[]
     */
    public function getMessages()
    {
        return $this->values['messages'];
    }

    /**
     * @param string $messageString
     *
     * @return bool
     */
    public function hasMessage($messageString)
    {
        $messages = $this->getMessages();
        foreach ($messages as $message) {
            if ($message->getMessage() === $messageString) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param Message $message
     *
     * @return self
     */
    public function addMessage(Message $message)
    {
        $this->values['messages'][] = $message;

        return $this;
    }

    /**
     * @param array $messages
     *
     * @return self
     */
    public function addMessages(array $messages)
    {
        foreach ($messages as $message) {
            $this->addMessage($message);
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->values['success'];
    }

    /**
     * @param bool $success
     *
     * @return self
     */
    public function setSuccess($success)
    {
        $this->values['success'] = $success;

        return $this;
    }

    /**
     * @return TransferInterface
     */
    public function getTransfer()
    {
        if (!empty($this->values['transferClassName']) && !empty($this->values['transfer'])) {
            $transfer = $this->createTransferObject(
                $this->values['transferClassName']
            );
            $transfer->fromArray($this->values['transfer'], true);

            return $transfer;
        }

        return;
    }

    /**
     * @param $transferClassName
     *
     * @return TransferInterface
     */
    private function createTransferObject($transferClassName)
    {
        $transfer = new $transferClassName();

        return $transfer;
    }

    /**
     * @param TransferInterface $transferObject
     *
     * @return self
     */
    public function setTransfer(TransferInterface $transferObject)
    {
        $this->values['transfer'] = $transferObject->toArray();
        $this->values['transferClassName'] = get_class($transferObject);

        return $this;
    }

}
