<?php

/**
 * Copyright 2017 DataStax, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Cassandra;

/**
 * A PHP representation of a schema
 */
final class DefaultSchema implements Schema {

    /**
     * Returns a Keyspace instance by name.
     *
     * @param string $name Name of the keyspace to get
     *
     * @return Keyspace Keyspace instance or null
     */
    public function keyspace($name) { }

    /**
     * Returns all keyspaces defined in the schema.
     *
     * @return array An array of `Keyspace` instances.
     */
    public function keyspaces() { }

    /**
     * Get the version of the schema snapshot
     *
     * @return int Version of the schema.
     */
    public function version() { }

}
