<?php

declare(strict_types=1);

/**
 * SPDX-FileCopyrightText: 2024 Nextcloud GmbH and Nextcloud contributors
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

class EventClass implements JsonSerializable {
	public function __construct(
		public readonly string $className,
		public readonly string $summary,
		public readonly string $description,
		public readonly array $sinceTags,
	) {
	}

	public function jsonSerialize(): mixed {
		return [
			'className' => $this->className,
			'summary' => $this->summary,
			'description' => $this->description,
			'since' => $this->sinceTags,
		];
	}
}
