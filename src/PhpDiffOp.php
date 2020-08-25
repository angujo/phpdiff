<?php


namespace Angujo\PhpDiff;


/**
 * Persisted opcodes (string) are a sequence of atomic opcode.
 * A single opcode can be one of the following:
 *   c | c{n} | d | d{n} | i:{c} | i{length}:{s}
 *   'c'        = copy one character from source
 *   'c{n}'     = copy n characters from source
 *   'd'        = skip one character from source
 *   'd{n}'     = skip n characters from source
 *   'i:{c}     = insert character 'c'
 *   'i{n}:{s}' = insert string s, which is of length n
 *
 * Do not exist as of now, under consideration:
 *   'm{n}:{o}  = move n characters from source o characters ahead.
 *   It would be essentially a shortcut for a delete->copy->insert
 *   command (swap) for when the inserted segment is exactly the same
 *   as the deleted one, and with only a copy operation in between.
 *   TODO: How often this case occurs? Is it worth it? Can only
 *   be done as a postprocessing method (->optimize()?)
 */
abstract class PhpDiffOp
{
    abstract public function getFromLen();

    abstract public function getToLen();

    abstract public function getOpcode();
}
