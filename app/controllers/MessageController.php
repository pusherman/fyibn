<?php

class MessageController extends BaseController 
{
    /**
     * Inbox
     */
	public function index()
	{
		return View::make('message.index');
	}
}