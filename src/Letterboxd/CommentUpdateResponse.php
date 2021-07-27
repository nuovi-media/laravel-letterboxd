<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class CommentUpdateResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property AbstractComment $data
 * @property CommentUpdateMessage $message
 */
class CommentUpdateResponse extends LetterboxdBaseElement
{
    protected AbstractComment $comment;
    protected CommentUpdateMessage $message;

    /**
     * @param AbstractComment|array $comment
     */
    protected function setComment(AbstractComment|array $comment)
    {
        $this->comment = is_array($comment) ? new ${$comment['type']}($comment) : $comment;
    }

    /**
     * @param CommentUpdateMessage|array $message
     */
    protected function setMessage(CommentUpdateMessage|array $message)
    {
        $this->message = is_array($message) ? new CommentUpdateMessage($message) : $message;
    }

}